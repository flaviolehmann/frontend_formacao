import { Funcionario } from './../../models/funcionario.model';
import { Component, OnInit } from '@angular/core';
import { FormBuilder, Validators, FormGroup } from '@angular/forms';

import { switchMap } from 'rxjs/operators';

import { ActivatedRoute } from '@angular/router';
import { FuncionarioService } from 'src/app/services/funcionario.service';

@Component({
  selector: 'app-funcionario-form',
  templateUrl: './funcionario-form.component.html',
  styleUrls: ['./funcionario-form.component.css']
})
export class FuncionarioFormComponent implements OnInit {

  funcionarioId: number = null;
  formulario: FormGroup;
  funcionario: Funcionario = new Funcionario();

  constructor(
    private activeRoute: ActivatedRoute,
    private funcionarioService: FuncionarioService,
    private formBuilder: FormBuilder
  ) { }

  ngOnInit(): void {
    this.iniciarForm();
    // this.activeRoute.params.subscribe(params => this.funcionarioId = params['id']);
    // this.activeRoute.paramMap.pipe(
    //   switchMap(params => this.funcionarioService.obterPorId(+params.get("id")))
    // ).subscribe(res => {
    //   console.log(res);
    //   this.funcionario = res;
    //   this.formulario.patchValue(this.funcionario);
    // })

  }

  salvar() {
    console.log(this.formulario);
    if (this.formulario.valid) {
      console.log('salvar');
    }
  }

  carregarFuncionario(id: number) {
    if (id) {
      this.funcionarioService.obterPorId(id)
        .subscribe(result => {
          console.log(result);
        })
    }
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
      complemento: [null],
      cidade: [null, [Validators.required]],
      uf: [null, [Validators.required]],
      cep: [null, [Validators.required]],
      salario: [null, [Validators.required]],
      status: [null, [Validators.required]],
      cargo_id: [null, [Validators.required]],
      filial_id: [null, [Validators.required]],
    })
  }

}
