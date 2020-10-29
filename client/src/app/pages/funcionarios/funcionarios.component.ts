import { Component, OnInit } from '@angular/core';

import { FuncionarioService } from './../../services/funcionario.service';

@Component({
  selector: 'app-funcionarios',
  templateUrl: './funcionarios.component.html',
  styleUrls: ['./funcionarios.component.css']
})
export class FuncionariosComponent implements OnInit {

  listaFuncionarios: any = [];

  constructor(
    private funcionarioService: FuncionarioService
  ) { }

  ngOnInit(): void {
    this.listarFuncionarios();
  }

  listarFuncionarios() {
    this.funcionarioService.listar().subscribe(
      result => {
        this.listaFuncionarios = result;
      }, error => {
        console.error(error);
      }
    )
  }

  excluir(id: number): void {
    console.log(id);
  }

}
