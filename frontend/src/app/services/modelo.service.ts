import { Observable } from 'rxjs';
import { Modelo } from './../models/modelo.model';
import { HttpClient } from '@angular/common/http';
import { environment } from './../../environments/environment.prod';
import { Injectable } from '@angular/core';

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
}
