import { MessageService } from 'primeng';
import { FilialService } from './../../services/filial.service';
import { Component, OnInit } from '@angular/core';
import { Filial } from 'src/app/models/filial.model';

@Component({
  selector: 'app-filial',
  templateUrl: './filial.component.html',
  styleUrls: ['./filial.component.css']
})
export class FilialComponent implements OnInit {

  listaFiliais: Filial[] = [];

  constructor(
    private filialService: FilialService,
    private messageService: MessageService
  ) { }

  ngOnInit(): void {
    this.carregarFiliais();
  }

  carregarFiliais() {
    this.filialService.index().subscribe(
      response => {
        this.listaFiliais = response;
      },
      () => {
        this.messageService.add({ severity: "error", summary: "Error!", detail: "Erro ao listar filiais." });
      }
    )
  }

  deleteFilial(id: number | string) {
    this.filialService.delete(id).subscribe(
      () => {
        this.messageService.add({ severity: "success", summary: "Sucesso!", detail: "Filial excluído." });
      },
      () => {
        this.messageService.add({ severity: "error", summary: "Error!", detail: "Erro ao excluir filial." });
      }
    )
  }

}
