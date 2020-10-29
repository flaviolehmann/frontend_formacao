<<<<<<< HEAD
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { environment } from './../../environments/environment.prod';
import { Injectable } from '@angular/core';
import { Funcionario } from '../models/funcionario.model';

=======
import {Injectable} from '@angular/core';
import {HttpClient} from '@angular/common/http';

import {Observable} from 'rxjs';
import {environment} from '../../environments/environment.prod';
import {Funcionario} from '../models/funcionario.model';
import {SelectItem} from "primeng";
>>>>>>> 5109312fee3fc76cbb1b963b7ab3fefcd66d882d


@Injectable({
  providedIn: 'root'
})
export class FuncionarioService {

<<<<<<< HEAD
    apiURL: string = `${environment.apiUrl}/funcionarios`;

    constructor(private http: HttpClient) { }

    index(): Observable<Funcionario[]> {
        return this.http.get<Funcionario[]>(this.apiURL);
    }
=======
  api: string = `${environment.apiUrl}/funcionarios`;

  constructor(
      private http: HttpClient
  ) { }

  listar(): Observable<any> {
      return this.http.get(this.api)
  }

  obterPorId(id: number): Observable<any> {
    return this.http.get(`${this.api}/${id}`);
  }

  save(data: Funcionario): Observable<any> {
    if (data.id) {
      return this.atualizar(data);
    }
    return this.create(data);
  }

  create(data: Funcionario): Observable<any> {
    return this.http.post(this.api, data);
  }

  atualizar(data: Funcionario): Observable<any> {
    return this.http.put(`${this.api}/${data.id}`, data);
  }

  excluir(id: number): Observable<any> {
    return this.http.delete(`${this.api}/${id}`);
  }

  getSexos(): SelectItem[] {
    return [
      { label: "Selecione um sexo", value: null },
      { label: "Masculino", value: "M" },
      { label: "Feminino", value: "F" }
    ];
  }
>>>>>>> 5109312fee3fc76cbb1b963b7ab3fefcd66d882d
}
