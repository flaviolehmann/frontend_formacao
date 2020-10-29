import { Categoria } from './../models/categoria.model';
import { Observable } from 'rxjs';
import { HttpClient } from '@angular/common/http';
import { environment } from './../../environments/environment.prod';
import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class CategoriaService {

    apiURL: string = `${environment.apiUrl}/categorias`;

    constructor(private http: HttpClient) { }

    index(): Observable<Categoria[]> {
        return this.http.get<Categoria[]>(this.apiURL);
    }

    show(id: number | string): Observable<Categoria> {
        return this.http.get<Categoria>(`${this.apiURL}/${id}`);
    }
}
