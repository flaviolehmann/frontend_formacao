<<<<<<< HEAD
=======

>>>>>>> 5109312fee3fc76cbb1b963b7ab3fefcd66d882d
import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-teste',
  templateUrl: './teste.component.html',
  styleUrls: ['./teste.component.css']
})
export class TesteComponent implements OnInit {

<<<<<<< HEAD
  constructor() { }

  ngOnInit(): void {
=======
    numero: any;
    var1:number = 3;
    numerosArray = [1, 2, 3, 4, 5, 6];

  constructor() { }

  ngOnInit(): void {
      this.numero = {id: 1, nome: 'teste'};
  }

  testeClick() {
      this.var1 *= 10;
>>>>>>> 5109312fee3fc76cbb1b963b7ab3fefcd66d882d
  }

}
