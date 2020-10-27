import { Injectable } from "@angular/core";
import { HttpClient } from "@angular/common/http";

import { Observable } from "rxjs";
import { environment } from "./../../environments/environment.prod";
import { Funcionario } from "../models/funcionario.model";

@Injectable({
  providedIn: "root",
})
export class FuncionarioService {

  api = `${environment.apiUrl}/funcionarios`;

  constructor(private http: HttpClient) {}

  listar(): Observable<Funcionario[]> {
    return this.http.get<Funcionario[]>(this.api);
  }

  obterPorId(id: number | string): Observable<Funcionario> {
    return this.http.get<Funcionario>(`${this.api}/${id}`);
  }

  save(funcionario: Funcionario): Observable<Funcionario> {
    if (funcionario.id) {
      return this.atualizar(funcionario);
    }
    return this.create(funcionario);
  }

  private create(funcionario: Funcionario): Observable<Funcionario> {
    return this.http.post<Funcionario>(this.api, funcionario);
  }

  private atualizar(funcionario: Funcionario): Observable<Funcionario> {
    return this.http.put<Funcionario>(`${this.api}/${funcionario.id}`, funcionario);
  }

  excluir(id: number | string): Observable<any> {
    return this.http.delete(`${this.api}/${id}`);
  }
}
