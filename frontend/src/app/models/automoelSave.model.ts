export class AutomovelSave {
    id: number;
    nome: string;
    ano: number;
    cor: string;
    nr_chassi: number;
    modelo_id: number;
    filial_id: number;
    categoria_id: number;

    constructor( id, nome, cor, ano, nr_chassi, modelo_id, filial_id, categoria_id) {
        this.id = id;
        this.nome = nome;
        this.cor = cor;
        this.ano = ano;
        this.nr_chassi = nr_chassi;
        this.modelo_id = modelo_id;
        this.filial_id = filial_id;
        this.categoria_id = categoria_id;
    }
}

