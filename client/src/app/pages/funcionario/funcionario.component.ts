import { Component, OnInit } from '@angular/core';
import { FuncionarioService } from 'src/app/services/funcionario.service';

@Component({
  selector: 'app-funcionario',
  templateUrl: './funcionario.component.html',
  styleUrls: ['./funcionario.component.css']
})
export class FuncionarioComponent implements OnInit {

    listaFuncionarios: any = [
        {
            "id": 1,
            "nome": "Kaio Braga",
            "data_aniversario": "1998-03-10T00:00:00.000000Z",
            "sexo": ";",
            "cpf": "r",
            "numero": "1995715290",
            "rua": "Q",
            "bairro": "4",
            "complemento": "C",
            "cidade": "\/",
            "uf": "7",
            "cep": "9",
            "salario": 2,
            "status": 1,
            "cargo_id": 1,
            "filial_id": 1
        }
    ];

    constructor(private funcionarioService: FuncionarioService) { }

    ngOnInit(): void {
        this.getFuncionarios();
    }

    getFuncionarios() {
        this.funcionarioService.listar().subscribe(
            response => {
                this.listaFuncionarios = response;
            },
            error => {
                alert("Erro ao listar funcionarios");
            }
        )
    }

    deleteFuncionaro(funcionario){}

}
