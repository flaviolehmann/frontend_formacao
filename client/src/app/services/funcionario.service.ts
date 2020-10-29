import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { environment } from './../../environments/environment.prod';
import { Injectable } from '@angular/core';
import { Funcionario } from '../models/funcionario.model';



@Injectable({
  providedIn: 'root'
})
export class FuncionarioService {

    apiURL: string = `${environment.apiUrl}/funcionarios`;

    constructor(private http: HttpClient) { }

    index(): Observable<Funcionario[]> {
        return this.http.get<Funcionario[]>(this.apiURL);
    }
}
