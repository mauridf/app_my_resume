<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- início do card de busca -->
                <card-component titulo="Busca de marcas">
                    <template v-slot:conteudo>
                        <div class="form-row">
                            <div class="col mb-3">
                                <input-container-component titulo="ID" id="inputId" id-help="idHelp" texto-ajuda="Opcional. Informe o ID">
                                    <input type="number" class="form-control" id="inputId" aria-describedby="idHelp" placeholder="ID" v-model="busca.id">
                                </input-container-component> 
                            </div>
                            <div class="col mb-3">
                                <input-container-component titulo="Nome" id="inputNome" id-help="nomeHelp" texto-ajuda="Opcional. Informe o nome">
                                    <input type="text" class="form-control" id="inputNome" aria-describedby="nomeHelp" placeholder="Nome" v-model="busca.nome">
                                </input-container-component>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col mb-3">
                                <input-container-component titulo="E-mail" id="inputEmail" id-help="emailHelp" texto-ajuda="Opcional. Informe o e-mail">
                                    <input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" placeholder="E-mail" v-model="busca.email">
                                </input-container-component>
                            </div>
                            <div class="col mb-3">
                                <input-container-component titulo="Telefone" id="inputTelefone" id-help="telefoneHelp" texto-ajuda="Opcional. Informe o telefone">
                                    <input type="text" class="form-control" id="inputTelefone" aria-describedby="telefoneHelp" placeholder="Telefone" v-model="busca.telefone">
                                </input-container-component>
                            </div>
                        </div>
                    </template>
                    <template v-slot:rodape>
                        <button type="submit" class="btn btn-primary btn-sm float-right" @click="pesquisar()">Pesquisar</button>
                    </template>
                </card-component>
                <!-- fim do card de busca -->

                <!-- início do card de listagem de pessoas -->
                <card-component titulo="Relação de pessoas">
                    <template v-slot:conteudo>
                        <table-component
                            :dados="pessoas.data"
                            :visualizar="{visivel: true, dataToggle: 'modal', dataTarget: '#modalPessoaVisualizar'}"
                            :atualizar="{visivel: true, dataToggle: 'modal', dataTarget: '#modalPessoaAtualizar'}"
                            :remover="{visivel: true, dataToggle: 'modal', dataTarget: '#modalPessoaRemover'}"
                            :titulos="{
                                id: {titulo: 'ID', tipo: 'texto'},
                                nome: {titulo: 'Nome', tipo: 'texto'},
                                email: {titulo: 'E-mail', tipo:'texto'},
                                telefone: {titulo: 'Telefone', tipo:'texto'},
                                endereco: {titulo: 'Endereço', tipo:'texto'},
                                sexo: {titulo: 'Sexo', tipo:'texto'},
                                imagem: {titulo: 'Imagem', tipo: 'imagem'},
                                sinopse: {titulo: 'Telefone', tipo:'texto'},
                                imagem: {titulo: 'Foto', tipo: 'imagem'},
                            }"
                        ></table-component>
                    </template>

                    <template v-slot:rodape>
                        <div class="row">
                            <div class="col-10">
                                <paginate-component>
                                    <li v-for="l, key in pessoas.links" :key="key"
                                        :class="l.active ? 'page-item active' : 'page-item'"
                                        @click="paginacao(l)"
                                    >
                                        <a class="page-link" v-html="l.label"></a>
                                    </li>
                                </paginate-component>
                            </div>

                            <div class="col">
                                <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#modalPessoa">Adicionar</button>
                            </div>
                        </div>
                    </template>
                </card-component>
                <!-- fim do card de listagem de pessoas -->
            </div>
        </div>

        <!-- início do modal de inclusão de pessoa -->
        <modal-component id="modalPessoa" titulo="Adicionar pessoa">
            <template v-slot:alertas>
                <alert-component tipo="success" :detalhes="transacaoDetalhes" titulo="Cadastro realizado com sucesso" v-if="transacaoStatus == 'adicionado'"></alert-component>
                <alert-component tipo="danger" :detalhes="transacaoDetalhes" titulo="Erro ao tentar cadastrar a marca" v-if="transacaoStatus == 'erro'"></alert-component>
            </template>
            <template v-slot:conteudo>
                <div class="form-group">
                    <input-container-component titulo="Nome da pessoa" id="novoNome" id-help="novoNomeHelp" texto-ajuda="Informe o nome da pessoa">
                        <input type="text" class="form-control" id="novoNome" aria-describedby="novoNomeHelp" placeholder="Nome da pessoa" v-model="nomePessoa">
                    </input-container-component>
                    {{ nomePessoa }}
                </div>

                <div class="form-group">
                    <input-container-component titulo="E-mail da pessoa" id="novoEmail" id-help="novoEmailHelp" texto-ajuda="Informe o e-mail da pessoa">
                        <input type="email" class="form-control" id="novoEmail" aria-describedby="novoEmailHelp" placeholder="E-Mail da pessoa" v-model="emailPessoa">
                    </input-container-component>
                    {{ emailPessoa }}
                </div>

                <div class="form-group">
                    <input-container-component titulo="Telefone da pessoa" id="novoTelefone" id-help="novoTelefoneHelp" texto-ajuda="Informe o telefone da pessoa">
                        <input type="text" class="form-control" id="novoTelefone" aria-describedby="novoTelefoneHelp" placeholder="Telefone da pessoa" v-model="telefonePessoa">
                    </input-container-component>
                    {{ telefonePessoa }}
                </div>

                <div class="form-group">
                    <input-container-component titulo="Endereço da pessoa" id="novoEndereco" id-help="novoEnderecoHelp" texto-ajuda="Informe o endereço da pessoa">
                        <input type="text" class="form-control" id="novoEndereco" aria-describedby="novoEnderecoHelp" placeholder="Endereço da pessoa" v-model="enderecoPessoa">
                    </input-container-component>
                    {{ enderecoPessoa }}
                </div>

                <div class="form-group">
                    <input-container-component titulo="Sexo da pessoa" id="novoSexo" id-help="novoSexoHelp" texto-ajuda="Informe o sexo da pessoa">
                        <input type="text" class="form-control" id="novoSexo" aria-describedby="novoSexoHelp" placeholder="Sexo da pessoa" v-model="sexoPessoa">
                    </input-container-component>
                    {{ sexoPessoa }}
                </div>

                <div class="form-group">
                    <input-container-component titulo="Imagem" id="novoImagem" id-help="novoImagemHelp" texto-ajuda="Selecione uma imagem no formato PNG">
                        <input type="file" class="form-control-file" id="novoImagem" aria-describedby="novoImagemHelp" placeholder="Selecione uma imagem" @change="carregarImagem($event)">
                    </input-container-component>
                    {{ arquivoImagem }}
                </div>

                <div class="form-group">
                    <input-container-component titulo="Sumário da pessoa" id="novoSumario" id-help="novoSumarioHelp" texto-ajuda="Escreva o sumário da pessoa">
                        <!-- <input type="text" class="form-control" id="novoSumario" aria-describedby="novoSumarioHelp" placeholder="Sumário da pessoa" v-model="sumarioPessoa"> -->
                        <textarea class="form-control" id="novoSumario" rows="3" aria-describedby="novoSumarioHelp" placeholder="Sumário da pessoa" v-model="sumarioPessoa"></textarea>
                    </input-container-component>
                    {{ sumarioPessoa }}
                </div>
            </template>
            <template v-slot:rodape>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary" @click="salvar()">Salvar</button>
            </template>
        </modal-component>
        <!-- fim do modal de inclusão de pessoa -->

        <!-- início do modal de visualização de pessoa -->
        <modal-component id="modalPessoaVisualizar" titulo="Visualizar pessoa">
            <template v-slot:alertas></template>
            <template v-slot:conteudo>
                <input-container-component titulo="ID">
                    <input type="text" class="form-control" :value="$store.state.item.id" disabled>
                </input-container-component>

                <input-container-component titulo="Nome pessoa">
                    <input type="text" class="form-control" :value="$store.state.item.nome" disabled>
                </input-container-component>

                <input-container-component titulo="E-mail">
                    <input type="text" class="form-control" :value="$store.state.item.email" disabled>
                </input-container-component>

                <input-container-component titulo="Telefone">
                    <input type="text" class="form-control" :value="$store.state.item.telefone" disabled>
                </input-container-component>

                <input-container-component titulo="Foto">
                    <img :src="'storage/'+$store.state.item.imagem" v-if="$store.state.item.imagem">
                </input-container-component>
            </template>
            <template v-slot:rodape>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </template>
        </modal-component>
        <!-- fim do modal de visualização de pessoa -->

        <!-- início do modal de remoção de pessoa -->
        <modal-component id="modalPessoaRemover" titulo="Remover pessoa">
            <template v-slot:alertas>
                <alert-component tipo="success" titulo="Transação realizada com sucesso" :detalhes="$store.state.transacao" v-if="$store.state.transacao.status == 'sucesso'"></alert-component>
                <alert-component tipo="danger" titulo="Erro na transação" :detalhes="$store.state.transacao" v-if="$store.state.transacao.status == 'erro'"></alert-component>
            </template>
            <template v-slot:conteudo v-if="$store.state.transacao.status != 'sucesso'">
                <input-container-component titulo="ID">
                    <input type="text" class="form-control" :value="$store.state.item.id" disabled>
                </input-container-component>

                <input-container-component titulo="Nome da marca">
                    <input type="text" class="form-control" :value="$store.state.item.nome" disabled>
                </input-container-component>
            </template>
            <template v-slot:rodape>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-danger" @click="remover()" v-if="$store.state.transacao.status != 'sucesso'">Remover</button>
            </template>
        </modal-component>
        <!-- fim do modal de remoção de pessoa -->

        <!-- início do modal de atualização de pessoa -->
        <modal-component id="modalPessoaAtualizar" titulo="Atualizar pessoa">
            <template v-slot:alertas>
                <alert-component tipo="success" titulo="Transação realizada com sucesso" :detalhes="$store.state.transacao" v-if="$store.state.transacao.status == 'sucesso'"></alert-component>
                <alert-component tipo="danger" titulo="Erro na transação" :detalhes="$store.state.transacao" v-if="$store.state.transacao.status == 'erro'"></alert-component>
            </template>

            <template v-slot:conteudo>
                <div class="form-group">
                    <input-container-component titulo="Nome" id="atualizarNome" id-help="atualizarNomeHelp" texto-ajuda="Informe o nome">
                        <input type="text" class="form-control" id="atualizarNome" aria-describedby="atualizarNomeHelp" placeholder="Nome da marca" v-model="$store.state.item.nome">
                    </input-container-component>
                </div>

                <div class="form-group">
                    <input-container-component titulo="E-mail da pessoa" id="atualizarEmail" id-help="atualizarEmailHelp" texto-ajuda="Informe o e-mail da pessoa">
                        <input type="email" class="form-control" id="atualizarEmail" aria-describedby="atualizarEmailHelp" placeholder="E-Mail da pessoa" v-model="$store.state.item.email">
                    </input-container-component>
                </div>

                <div class="form-group">
                    <input-container-component titulo="Telefone da pessoa" id="atualizarTelefone" id-help="atualizarTelefoneHelp" texto-ajuda="Informe o telefone da pessoa">
                        <input type="text" class="form-control" id="atualizarTelefone" aria-describedby="atualizarTelefoneHelp" placeholder="Telefone da pessoa" v-model="$store.state.item.telefone">
                    </input-container-component>
                </div>

                <div class="form-group">
                    <input-container-component titulo="Endereço da pessoa" id="atualizarEndereco" id-help="atualizarEnderecoHelp" texto-ajuda="Informe o endereço da pessoa">
                        <input type="text" class="form-control" id="atualizarEndereco" aria-describedby="atualizarEnderecoHelp" placeholder="Endereço da pessoa" v-model="$store.state.item.endereco">
                    </input-container-component>
                </div>

                <div class="form-group">
                    <input-container-component titulo="Sexo da pessoa" id="atualizarSexo" id-help="atualizarSexoHelp" texto-ajuda="Informe o sexo da pessoa">
                        <input type="text" class="form-control" id="atualizarSexo" aria-describedby="atualizarSexoHelp" placeholder="Sexo da pessoa" v-model="$store.state.item.sexo">
                    </input-container-component>
                </div>

                <div class="form-group">
                    <input-container-component titulo="Imagem" id="atualizarImagem" id-help="atualizarImagemHelp" texto-ajuda="Selecione uma imagem no formato PNG">
                        <input type="file" class="form-control-file" id="atualizarImagem" aria-describedby="atualizarImagemHelp" placeholder="Selecione uma imagem" @change="carregarImagem($event)">
                    </input-container-component>
                </div>

                <!-- {{$store.state.item}} -->
                <div class="form-group">
                    <input-container-component titulo="Sumário da pessoa" id="atualizarSumario" id-help="atualizarSumarioHelp" texto-ajuda="Escreva o sumário da pessoa">
                        <input type="text" class="form-control" id="atualizarSumario" aria-describedby="atualizarSumarioHelp" placeholder="Sumário da pessoa" v-model="$store.state.item.sumario">
                        <!-- <textarea class="form-control" id="atualizarSumario" rows="3" aria-describedby="atualizarSumarioHelp" placeholder="Sumário da pessoa" v-model="$store.state.item.sumario"></textarea> -->
                    </input-container-component>
                </div>
            </template>

            <template v-slot:rodape>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary" @click="atualizar()">Atualizar</button>
            </template>
        </modal-component>
        <!-- fim do modal de inclusão de marca -->

    </div>
</template>

<script>
    export default {
        computed: {
            token() {

                let token = document.cookie.split(';').find(indice => {
                    return indice.includes('token=')
                })

                token = token.split('=')[1]
                token = 'Bearer ' + token

                return token
            }
        },
        data() {
            return {
                urlBase: 'http://127.0.0.1:8000/api/v1/pessoa',
                urlPaginacao: '',
                urlFiltro: '',
                nomePessoa: '',
                emailPessoa: '',
                telefonePessoa: '',
                enderecoPessoa: '',
                sexoPessoa: '',
                arquivoImagem: [],
                sumarioPessoa: '',
                transacaoStatus: '',
                transacaoDetalhes: [],
                pessoas: { data: [] },
                busca: { id: '', nome: '', email: '', telefone: '' }
            }
        },
        methods: {
            atualizar() {
                let formData = new FormData();
                formData.append('_method', 'patch')
                formData.append('nome', this.$store.state.item.nome)

                if(this.arquivoImagem[0]) {
                    formData.append('imagem', this.arquivoImagem[0])
                }

                let url = this.urlBase + '/' + this.$store.state.item.id

                let config = {
                    headers: {
                        'Content-Type': 'multipart/form-data',
                        'Accept': 'application/json',
                        'Autorization': this.token
                    }
                }

                axios.post(url, formData, config)
                    .then(response => {
                        this.$store.state.transacao.status = 'sucesso'
                        this.$store.state.transacao.mensagem = 'Registro de pessoa atualizado com sucesso!'
                        //limpar o campo de seleção de arquivos
                        atualizarImagem.value = ''
                        this.carregarLista()
                    })
                    .catch(errors => {
                        this.$store.state.transacao.status = 'erro'
                        this.$store.state.transacao.mensagem = errors.response.data.message
                        this.$store.state.transacao.dados = errors.response.data.errors
                    })
            },
            remover() {
                let confirmacao = confirm('Tem certeza que deseja remover esse registro?')

                if(!confirmacao) {
                    return false;
                }

                let formData = new FormData();
                formData.append('_method', 'delete')

                let config = {
                    headers: {
                        'Accept': 'application/json',
                        'Autorization': this.token
                    }
                }

                let url = this.urlBase + '/' + this.$store.state.item.id

                axios.post(url, formData, config)
                    .then(response => {
                        this.$store.state.transacao.status = 'sucesso'
                        this.$store.state.transacao.mensagem = response.data.msg
                        this.carregarLista()
                    })
                    .catch(errors => {
                        this.$store.state.transacao.status = 'erro'
                        this.$store.state.transacao.mensagem = errors.response.data.erro
                    })

            },
            pesquisar() {
                //console.log(this.busca)
                let filtro = ''
                for(let chave in this.busca) {
                    if(this.busca[chave]) {
                        //console.log(chave, this.busca[chave])
                        if(filtro != '') {
                            filtro += ";"
                        }
                        filtro += chave + ':like:' + this.busca[chave]
                    }
                }
                if(filtro != '') {
                    this.urlPaginacao = 'page=1'
                    this.urlFiltro = '&filtro='+filtro
                } else {
                    this.urlFiltro = ''
                }
                this.carregarLista()
            },
            paginacao(l) {
                if(l.url) {
                    //this.urlBase = l.url //ajustando a url de consulta com o parâmetro de página
                    this.urlPaginacao = l.url.split('?')[1]
                    this.carregarLista() //requisitando novamente os dados para nossa API
                }
            },
            carregarLista() {
                let config = {
                    headers: {
                        'Accept': 'application/json',
                        'Authorization': this.token
                    }
                }

                let url = this.urlBase + '?' + this.urlPaginacao + this.urlFiltro
                console.log(url)
                axios.get(this.urlBase, config)
                    .then(response => {
                        this.pessoas = response.data
                        console.log(this.pessoas)
                    })
                    .catch(errors => {
                        console.log(errors)
                    })
            },
            carregarImagem(e) {
                this.arquivoImagem = e.target.files
            },
            salvar() {
                console.log(this.nomePessoa, this.emailPessoa, this.telefonePessoa, this.enderecoPessoa, this.sexoPessoa, this.arquivoImagem[0], this.sumarioPessoa)

                let formData = new FormData();
                formData.append('nome', this.nomePessoa)
                formData.append('email', this.emailPessoa)
                formData.append('telefone', this.telefonePessoa)
                formData.append('endereco',this.enderecoPessoa)
                formData.append('sexo', this.sexoPessoa)
                formData.append('imagem', this.arquivoImagem[0])
                formData.append('sumario',this.sumarioPessoa)

                let config = {
                    headers: {
                        'Content-Type': 'multipart/form-data',
                        'Accept': 'application/json',
                        'Authorization': this.token
                    }
                }

                axios.post(this.urlBase, formData, config)
                    .then(response => {
                        this.transacaoStatus = 'adicionado'
                        this.transacaoDetalhes = {
                            mensagem: 'ID do registro: ' + response.data.id
                        }
                        console.log(response)
                    })
                    .catch(errors => {
                        this.transacaoStatus = 'erro'
                        this.transacaoDetalhes = {
                            mensagem: errors.response.data.message,
                            dados: errors.response.data.errors
                        }
                        console.log(errors)
                    })
            }
        },
        mounted() {
            this.carregarLista()
        }
    }
</script>
