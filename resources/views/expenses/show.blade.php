@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2>Expense Details</h2>
            <div>
                <a href="{{ route('expenses.edit', $expense->id) }}" class="btn btn-warning">Edit</a>
                <a href="{{ route('expenses.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-3 fw-bold">Title:</div>
                <div class="col-md-9">{{ $expense->title }}</div>
            </div>
            
            <div class="row mb-3">
                <div class="col-md-3 fw-bold">Amount:</div>
                <div class="col-md-9">{{ number_format($expense->amount, 2) }}</div>
            </div>
            
            <div class="row mb-3">
                <div class="col-md-3 fw-bold">Date:</div>
                <div class="col-md-9">{{ $expense->expense_date->format('F d, Y') }}</div>
            </div>
            
            <div class="row mb-3">
                <div class="col-md-3 fw-bold">Category:</div>
                <div class="col-md-9">{{ $expense->category ?? 'N/A' }}</div>
            </div>
            
            <div class="row mb-3">
                <div class="col-md-3 fw-bold">Description:</div>
                <div class="col-md-9">{{ $expense->description ?? 'N/A' }}</div>
            </div>
            
            <div class="row mb-3">
                <div class="col-md-3 fw-bold">Created At:</div>
                <div class="col-md-9">{{ $expense->created_at->format('F d, Y H:i:s') }}</div>
            </div>
            
            <div class="row mb-3">
                <div class="col-md-3 fw-bold">Updated At:</div>
                <div class="col-md-9">{{ $expense->updated_at->format('F d, Y H:i:s') }}</div>
            </div>
        </div>
        <div class="card-footer">
            <form action="{{ route('expenses.destroy', $expense->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this expense?')">Delete</button>
            </form>
        </div>
    </div>
@endsection