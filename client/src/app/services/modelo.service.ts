import { Observable } from 'rxjs';
import { Modelo } from './../models/modelo.model';
import { HttpClient } from '@angular/common/http';
import { environment } from './../../environments/environment.prod';
import { Injectable } from '@angular/core';
import {Funcionario} from "../models/funcionario.model";

@Injectable({
  providedIn: 'root'
})
export class ModeloService {

    apiURL: string = `${environment.apiUrl}/modelos`;

    constructor(private http: HttpClient) { }

    index(): Observable<Modelo[]> {
        return this.http.get<Modelo[]>(this.apiURL);
    }

    show(id: number | string): Observable<Modelo> {
        return this.http.get<Modelo>(`${this.apiURL}/${id}`);
    }

    create(data: Funcionario): Observable<any> {
        return this.http.post(this.apiURL, data);
    }
}
