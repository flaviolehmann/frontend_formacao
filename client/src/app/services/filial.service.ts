import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { environment } from 'src/environments/environment.prod';
import { Filial } from '../models/filial.model';

@Injectable({
  providedIn: 'root'
})
export class FilialService {

  api = `${environment.apiUrl}/filiais`;

  constructor(private http: HttpClient) { }

  listar(): Observable<Filial[]> {
    return this.http.get<Filial[]>(this.api);
  }
}
