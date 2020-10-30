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

    show(id: number): Observable<Filial> {
        return this.http.get<Filial>(`${this.apiURL}/${id}`);
    }

    delete(id: number | string): Observable<any> {
      return this.http.delete(`${this.apiURL}/${id}`);
    }

    save(filial: Filial): Observable<Filial> {
      if(filial.id) {
        return this.update(filial);
      }
      return this.create(filial);
    }

    private update(filial: Filial): Observable<Filial> {
      return this.http.put<Filial>(`${this.apiURL}/${filial.id}`, filial);
    }

    private create(filial: Filial): Observable<Filial> {
      return this.http.post<Filial>(this.apiURL, filial);
    }
}
