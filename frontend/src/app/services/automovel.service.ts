import { AutomovelSave } from './../models/automoelSave.model';
import { Funcionario } from './../models/funcionario.model';
import { Observable } from 'rxjs';
import { Automovel } from './../models/automovel.model';
import { HttpClient } from '@angular/common/http';
import { environment } from './../../environments/environment.prod';
import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class AutomovelService {

    apiURL: string = `${environment.apiUrl}/automoveis`;

    constructor(private http: HttpClient) { }

    index(): Observable<Automovel[]> {

        return this.http.get<Automovel[]>(this.apiURL);
    }

    save(automovel: Automovel):Observable<Automovel> {
        if(automovel.id){
            return this.updateAutomovel(automovel);
        }
        return this.createAutomovel(automovel);
    }

    show(id: number | string): Observable<AutomovelSave> {
        return this.http.get<AutomovelSave>(`${this.apiURL}/${id}`);
    }

    delete(id: number | string): Observable<any> {
        return this.http.delete(`${this.apiURL}/${id}`);
    }

    private createAutomovel(automovel: Automovel): Observable<Automovel> {
        return this.http.post<Automovel>(this.apiURL, this.toSave(automovel));
    }

    private updateAutomovel(automovel: Automovel): Observable<Automovel> {
        return this.http.put<Automovel>(`${this.apiURL}/${automovel.id}`, this.toSave(automovel));
    }

    private toSave(automovel: Automovel): AutomovelSave {
        return new AutomovelSave(
            automovel.id,
            automovel.nome,
            automovel.cor,
            automovel.ano,
            automovel.nr_chassi,
            automovel.modelo.id,
            automovel.filial.id,
            automovel.categoria.id
            )
    }
}
