import {Component, OnInit} from '@angular/core';
import {ModeloService} from "../../services/modelo.service";

@Component({
  selector: 'app-modelos',
  templateUrl: './modelos.component.html',
  styleUrls: ['./modelos.component.css']
})
export class ModelosComponent implements OnInit {

  listaModelos;

  constructor(
      private modeloService: ModeloService
  ) { }

  ngOnInit(): void {
    this.listarCargos();
  }

  listarCargos() {
    this.modeloService.index().subscribe(
        result => {
          this.listaModelos = result;
        }, error => {
          console.error(error);
        }
    )
  }

  excluir(id: number): void {
    console.log(id);
  }

}
