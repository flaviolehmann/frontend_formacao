import { Component, OnInit } from '@angular/core';
import {CargoService} from "../../services/cargo.service";

@Component({
  selector: 'app-cargos',
  templateUrl: './cargos.component.html',
  styleUrls: ['./cargos.component.css']
})
export class CargosComponent implements OnInit {

  listaCargos;

  constructor(
    private cargoService: CargoService
  ) { }

  ngOnInit(): void {
    this.listarCargos();
  }

  listarCargos() {
    this.cargoService.listar().subscribe(
        result => {
          this.listaCargos = result;
        }, error => {
          console.error(error);
        }
    )
  }

  excluir(id: number): void {
    console.log(id);
  }
}
