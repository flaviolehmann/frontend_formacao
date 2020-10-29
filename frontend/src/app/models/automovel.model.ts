import { Categoria } from './categoria.model';
import { Filial } from './filial.model';
import { Modelo } from './modelo.model';
export class Automovel {
    id: number;
    nome: string;
    ano: number;
    cor: string;
    nr_chassi: number;
    modelo: Modelo;
    filial: Filial;
    categoria: Categoria;
}

