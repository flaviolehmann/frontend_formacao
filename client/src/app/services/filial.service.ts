import { Filial } from './../models/filial.model';
import { Observable } from 'rxjs';
import { HttpClient } from '@angular/common/http';
import { environment } from './../../environments/environment.prod';
import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class FilialService {

    apiURL: string = `${environment.apiUrl}/filiais`;

    constructor(private http: HttpClient) { }

    index(): Observable<Filial[]> {
        return this.http.get<Filial[]>(this.apiURL);
    }

    show(id: number | string): Observable<Filial> {
        return this.http.get<Filial>(`${this.apiURL}/${id}`);
    }

    delete(id: number | string): Observable<any> {
      return this.http.delete(`${this.apiURL}/${id}`);
    }
}
