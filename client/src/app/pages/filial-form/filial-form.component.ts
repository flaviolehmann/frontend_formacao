import { ActivatedRoute, Router } from '@angular/router';
import { MessageService } from 'primeng/api';
import { FilialService } from './../../services/filial.service';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';
import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-filial-form',
  templateUrl: './filial-form.component.html',
  styleUrls: ['./filial-form.component.css']
})
export class FilialFormComponent implements OnInit {

  formulario: FormGroup;
  filialId: string;

  constructor(
    private formBuilder: FormBuilder,
    private filialService: FilialService,
    private messageService: MessageService,
    private actRoute: ActivatedRoute,
    private route: Router
  ) { }

  ngOnInit(): void {
    this.filialId = this.actRoute.snapshot.paramMap.get('id');
    this.iniciarFormulario();

    if(this.filialId) {
      this.carregarFilial(this.filialId);
    }
  }

  iniciarFormulario() {
    this.formulario = this.formBuilder.group({
        id: [null],
        nome: [null, Validators.required],
        inscricao_estadual: [null, Validators.required],
        cnpj: [null, Validators.required],
        rua: [null, Validators.required],
        numero: [null, Validators.required],
        complemento: [null, Validators.required],
        bairro: [null, Validators.required],
        cidade: [null, Validators.required],
        uf: [null, Validators.required],
        cep: [null, Validators.required],
    })
  }

  carregarFilial(id: number | string) {
    this.filialService.show(+id).subscribe(
      response => {
        this.formulario.patchValue(response);
      },
      () => {
        this.messageService.add({ severity: "error", summary: "Erro!", detail: "Erro ao recuperar filial." });
      }
    )
  }

  salvar() {
    if(this.formulario.valid){
      this.filialService.save(this.formulario.value).subscribe(
        response => {
          this.messageService.add({ severity: "success", summary: "Sucesso!", detail: "Filial salva com sucesso." });
          this.route.navigate(['filiais']);
        },
        () => {
          this.messageService.add({ severity: "error", summary: "Erro!", detail: "Erro ao salvar filial." });
        }
      )
      return;
    }
    this.messageService.add({ severity: "error", summary: "Erro!", detail: "Formulário inválido." });
  }

}
