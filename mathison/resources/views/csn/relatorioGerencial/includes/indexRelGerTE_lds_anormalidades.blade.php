@extends('csn.templates.templateRelatorios')

	@section('content')
		@include('csn.relatorioGerencial.includes.navbarRelGer.navbarRelGerTE')
		@include('csn.relatorioGerencial.includes.relatoriosTermoEletrica.lds-anormalidades')
	@endsection
