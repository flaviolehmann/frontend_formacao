import { Component, OnInit } from '@angular/core';
import { MessageService } from 'primeng';
import { Funcionario } from 'src/app/models/funcionario.model';

import { FuncionarioService } from './../../services/funcionario.service';

@Component({
  selector: 'app-funcionarios',
  templateUrl: './funcionarios.component.html',
  styleUrls: ['./funcionarios.component.css']
})
export class FuncionariosComponent implements OnInit {

  isExcluindo: boolean = false;
  listaFuncionarios: Funcionario[] = [];

  constructor(
    private funcionarioService: FuncionarioService,
    private toastService: MessageService
  ) { }

  ngOnInit(): void {
    this.listarFuncionarios();
  }

  listarFuncionarios() {
    this.funcionarioService.listar().subscribe(
      (funcionarios) => {
        this.listaFuncionarios = funcionarios;
      }
    );
  }

  excluir(id: string | number): void {
    this.isExcluindo = true;
    this.funcionarioService.excluir(id).subscribe(
      () => {
        this.isExcluindo = false;
        this.toastService.add({severity: 'success', summary: 'Sucesso', detail: 'Funcionário excluido com sucesso!'});
        this.listarFuncionarios();
      },
      () => {
        this.isExcluindo = false;
        this.toastService.add({severity: 'error', summary: 'Error', detail: 'Falha ao excluir funcionario.'});
      }
    )
  }

}
