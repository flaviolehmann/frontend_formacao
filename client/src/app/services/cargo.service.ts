import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { environment } from 'src/environments/environment.prod';
import { Cargo } from '../models/cargo.model';

@Injectable({
  providedIn: 'root'
})
export class CargoService {

  api = `${environment.apiUrl}/cargos`;

  constructor(private http: HttpClient) { }

  listar(): Observable<Cargo[]> {
    return this.http.get<Cargo[]>(this.api);
  }
}
