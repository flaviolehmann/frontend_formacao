import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

import { Observable } from 'rxjs';
import { environment } from './../../environments/environment.prod';
import { Funcionario } from '../models/funcionario.model';


@Injectable({
  providedIn: 'root'
})
export class FuncionarioService {

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
}
