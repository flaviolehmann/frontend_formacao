import { MessageService } from 'primeng/api';
import { AutomovelService } from './../../services/automovel.service';
import { Automovel } from './../../models/automovel.model';
import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-automovel',
  templateUrl: './automovel.component.html',
  styleUrls: ['./automovel.component.css']
})
export class AutomovelComponent implements OnInit {

    listaAutomoveis: Automovel[] = [];

    constructor(
        private automovelService: AutomovelService,
        private messageService: MessageService
        ) { }

    ngOnInit(): void {
        this.carregarAutomoveis();
    }

    carregarAutomoveis() {
        this.automovelService.index().subscribe(
            response => {
                this.listaAutomoveis = response;
            },
            () => {
                this.messageService.add({ severity: "error", summary: "Error!", detail: "Erro ao listar automóveis." });
            }
        )
    }

    deleteAutomovel(id: number | string) {
        this.automovelService.delete(id).subscribe(
            () => {
                this.messageService.add({ severity: "success", summary: "Sucesso!", detail: "Automóvel excluído." }),
                this.carregarAutomoveis();
            },
            () => {
                this.messageService.add({ severity: "error", summary: "Error!", detail: "Erro ao deletar automóveis." });
            }
        )
    }

}
