import { MessageService } from 'primeng/api';
import { Router, ActivatedRoute } from '@angular/router';
import { AutomovelService } from './../../services/automovel.service';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';
import { FilialService } from './../../services/filial.service';
import { CategoriaService } from './../../services/categoria.service';
import { ModeloService } from './../../services/modelo.service';
import { Filial } from '../../models/filial.model';
import { Categoria } from './../../models/categoria.model';
import { Modelo } from './../../models/modelo.model';
import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-automovel-form',
  templateUrl: './automovel-form.component.html',
  styleUrls: ['./automovel-form.component.css']
})
export class AutomovelFormComponent implements OnInit {

    listaModelos: Modelo[] = [{id:null, descricao: 'Selecione...'}];
    listaCategorias: Categoria[] = [{id:null, descricao: 'Selecione...'}];
    listaFiliais: Filial[] = [{id:null, nome: 'Selecione...'}];
    formulario: FormGroup;
    automovelId: string;

    constructor(
        private automovelService: AutomovelService,
        private modeloService: ModeloService,
        private categoriaService: CategoriaService,
        private filialService: FilialService,
        private formBuilder: FormBuilder,
        private messageService: MessageService,
        private route: Router,
        private activeRoute: ActivatedRoute,
    ) { }

    ngOnInit(): void {
        this.automovelId = this.activeRoute.snapshot.paramMap.get('id');
        this.carregarModelos();
        this.carregarCategorias();
        this.carregarFiliais();
        this.iniciarFormulario();

        if(this.automovelId) {
            this.buscarAutomovel(this.automovelId);
        }
    }

    iniciarFormulario() {
        this.formulario = this.formBuilder.group({
            id: [null],
            nome: [null, Validators.required],
            ano: [null, Validators.required],
            cor: [null, Validators.required],
            nr_chassi: [null, Validators.required],
            modelo: [null, Validators.required],
            categoria: [null, Validators.required],
            filial: [null, Validators.required],
        })
    }

    buscarAutomovel(id: number | string) {
        this.automovelService.show(id).subscribe(
            response => {
                this.formulario.patchValue(response);
                this.buscarFilial(response.filial_id);
                this.buscarCategoria(response.categoria_id);
                this.buscarModelo(response.modelo_id);
            },
            () => {
                this.messageService.add({ severity: "error", summary: "Error!", detail: "Erro ao recuperar automóvel." });
            }
        )
    }

    buscarFilial(id: number | string) {
        this.filialService.show(+id).subscribe(
            response => {
                this.formulario.patchValue({'filial': response});
            },
            () => {
                this.messageService.add({ severity: "error", summary: "Error!", detail: "Erro ao recuperar filial." });
            }
        )
    }

    buscarCategoria(id: number | string) {
        this.categoriaService.show(id).subscribe(
            response => {
                this.formulario.patchValue({'categoria': response});
            },
            erro => {
                this.messageService.add({ severity: "error", summary: "Error!", detail: "Erro ao recuperar categoria." });
            }
        )
    }

    buscarModelo(id: number | string) {
        this.modeloService.show(id).subscribe(
            response => {
                this.formulario.patchValue({'modelo': response});
            },
            () => {
                this.messageService.add({ severity: "error", summary: "Error!", detail: "Erro ao recuperar modelo." });
            }
        )
    }

    carregarModelos() {
        this.modeloService.index().subscribe(
            response => {
                this.listaModelos = this.listaModelos.concat(response);
            },
            () => {
                this.messageService.add({ severity: "error", summary: "Error!", detail: "Erro ao listar modelos." });
            }
        )
    }

    carregarCategorias() {
        this.categoriaService.index().subscribe(
            response => {
                this.listaCategorias = this.listaCategorias.concat(response);
            },
            () => {
                this.messageService.add({ severity: "error", summary: "Error!", detail: "Erro ao listar categorias." });
            }
        )
    }

    carregarFiliais() {
        this.filialService.index().subscribe(
            response => {
                this.listaFiliais = this.listaFiliais.concat(response);
            },
            () => {
                this.messageService.add({ severity: "error", summary: "Error!", detail: "Erro ao listar filiais." });
            }
        )
    }

    salvar() {
        if(this.formulario.valid){
            this.automovelService.save(this.formulario.value).subscribe(
                () => {
                    this.messageService.add({ severity: "success", summary: "Sucesso!", detail: "Automóvel salvo." })
                    this.route.navigate(['automoveis']);
                },
                () => {
                    this.messageService.add({ severity: "error", summary: "Error!", detail: "Erro ao salvar automóvel." });
                }
            )
            return;
        }
        this.messageService.add({ severity: "error", summary: "Error!", detail: "Formulário inválido." });
    }

}
