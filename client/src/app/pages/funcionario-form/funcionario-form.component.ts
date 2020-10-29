import {Component, OnInit} from '@angular/core';
import {FormBuilder, FormGroup, Validators} from '@angular/forms';

import {switchMap} from 'rxjs/operators';

import {ActivatedRoute} from '@angular/router';
import {FuncionarioService} from 'src/app/services/funcionario.service';
import {MessageService, SelectItem} from "primeng";

@Component({
  selector: 'app-funcionario-form',
  templateUrl: './funcionario-form.component.html',
  styleUrls: ['./funcionario-form.component.css']
})
export class FuncionarioFormComponent implements OnInit {

  formulario: FormGroup;

  constructor(
    private activeRoute: ActivatedRoute,
    private funcionarioService: FuncionarioService,
    private formBuilder: FormBuilder,
    private messageService: MessageService
  ) { }

  ngOnInit(): void {
    this.iniciarForm();
    this.atualizarParaEdicao();
  }

  atualizarParaEdicao() {
    this.activeRoute.paramMap
        .pipe(
            switchMap(params => this.funcionarioService.obterPorId(+params.get("id")))
        ).subscribe(res => {
          res.id && this.formulario.patchValue({ ...res, data_aniversario: new Date(res.data_aniversario) });
        }
    );
  }

  salvar() {
    if (this.formulario.valid) {
      this.funcionarioService.save(this.formulario.value).subscribe(
        () => this.messageService.add({ severity: "success", summary: "Sucesso!", detail: "Funcionário cadastrado." }),
        () => {
          this.messageService.add({ severity: "error", summary: "Error!", detail: "Verifique o formulário e tente novamente." });
        }
      )
      return;
    }
    this.messageService.add({ severity: "error", summary: "Error!", detail: "Formulário Inválido." });
  }

  iniciarForm() {
    this.formulario = this.formBuilder.group({
      id: [null],
      nome: ['', [Validators.required, Validators.minLength(3)]],
      data_aniversario: [null, [Validators.required]],
      sexo: [null, [Validators.required]],
      cpf: [null, [Validators.required, Validators.maxLength(11)]],
      numero: [null, [Validators.required]],
      rua: [null, [Validators.required]],
      bairro: [null, [Validators.required]],
      complemento: [null, [Validators.required]],
      cidade: [null, [Validators.required]],
      uf: [null, [Validators.required]],
      cep: [null, [Validators.required]],
      salario: [null, [Validators.required]],
      status: [null, [Validators.required]],
      cargo_id: [null, [Validators.required]],
      filial_id: [null, [Validators.required]],
    });
  }

  get sexos(): SelectItem[] {
    return this.funcionarioService.getSexos();
  }

}
