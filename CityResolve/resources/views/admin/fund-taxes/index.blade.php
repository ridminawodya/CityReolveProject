@extends('admin.layout')

@section('content')
<!-- Add the CSS directly in a style tag for this page -->
<style>
/* Import a nice font and icon library */
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');
@import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css');

/* Define CSS variables for easy color management */
:root {
    --primary-color: #4CAF50;
    --primary-hover: #43A047;
    --secondary-color: #F8F9FA;
    --card-bg: #FFFFFF;
    --text-color: #333333;
    --label-color: #6B7280;
    --border-color: #E5E7EB;
    --shadow-light: rgba(0, 0, 0, 0.05);
    --shadow-medium: rgba(0, 0, 0, 0.1);
    --info-color: #3B82F6;
    --danger-color: #EF4444;
}

body {
    font-family: 'Inter', sans-serif;
    color: var(--text-color);
    background-color: var(--secondary-color);
}

/* Main container and page header styling */
.container-fluid {
    max-width: 1200px;
    margin: 40px auto;
    padding: 20px;
}

.page-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.page-header h1 {
    font-size: 2rem;
    font-weight: 700;
}

/* Button styling */
.btn {
    padding: 12px 24px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-size: 1rem;
    font-weight: 600;
    text-decoration: none;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

.btn-primary {
    background: var(--primary-color);
    color: #fff;
    background: linear-gradient(135deg, var(--primary-color) 0%, #81C784 100%);
    box-shadow: 0 4px 6px rgba(76, 175, 80, 0.2);
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 12px rgba(76, 175, 80, 0.3);
}

.btn-secondary {
    background-color: var(--border-color);
    color: var(--text-color);
}

.btn-secondary:hover {
    background-color: #D1D5DB;
    transform: translateY(-2px);
    box-shadow: 0 4px 6px var(--shadow-medium);
}

.btn-danger {
    background-color: var(--danger-color);
    color: #fff;
}

.btn-danger:hover {
    background-color: #DC2626;
    transform: translateY(-2px);
    box-shadow: 0 4px 6px rgba(239, 68, 68, 0.2);
}

/* Search form styling */
.search-form {
    background-color: var(--card-bg);
    border-radius: 12px;
    box-shadow: 0 4px 12px var(--shadow-medium);
    padding: 20px;
    margin-bottom: 20px;
}

.search-form form {
    display: flex;
    gap: 10px;
    align-items: center;
}

.search-input {
    flex-grow: 1;
    padding: 10px;
    border: 1px solid var(--border-color);
    border-radius: 8px;
    font-size: 1rem;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
}

.search-input:focus {
    outline: none;
    border-color: var(--primary-color);
    box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.2);
}

/* Table styling */
.table-container {
    background-color: var(--card-bg);
    border-radius: 12px;
    box-shadow: 0 4px 12px var(--shadow-medium);
    overflow: hidden;
}

.table {
    width: 100%;
    border-collapse: collapse;
}

.table th, .table td {
    padding: 15px;
    text-align: left;
    border-bottom: 1px solid var(--border-color);
}

.table th {
    font-weight: 600;
    color: var(--label-color);
    text-transform: uppercase;
    font-size: 0.8rem;
}

.table tbody tr:hover {
    background-color: var(--secondary-color);
}

.table tbody tr:last-child td {
    border-bottom: none;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .page-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 10px;
    }

    .search-form form {
        flex-direction: column;
        align-items: stretch;
    }
}

/* Pagination links styling */
.pagination {
    display: flex;
    justify-content: center;
    padding: 20px 0;
    list-style: none;
}

.pagination > li {
    margin: 0 5px;
}

.pagination > li > span, .pagination > li > a {
    padding: 8px 12px;
    border-radius: 8px;
    text-decoration: none;
    color: var(--text-color);
    border: 1px solid var(--border-color);
    transition: all 0.3s ease;
}

.pagination > li.active > span {
    background-color: var(--primary-color);
    border-color: var(--primary-color);
    color: #fff;
    box-shadow: 0 2px 6px rgba(76, 175, 80, 0.2);
}

.pagination > li > a:hover {
    background-color: var(--primary-color);
    border-color: var(--primary-color);
    color: #fff;
}
</style>

<div class="container-fluid">
    <div class="page-header">
        <h1>Fund & Tax Management</h1>
        <a href="{{ route('admin.fund-taxes.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add New Record
        </a>
    </div>

    <div class="search-form">
        <form method="GET" action="{{ route('admin.fund-taxes.index') }}">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by department name..." class="form-control search-input">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-search"></i> Search
            </button>
            @if(request('search'))
                <a href="{{ route('admin.fund-taxes.index') }}" class="btn btn-secondary">
                    <i class="fas fa-eraser"></i> Clear
                </a>
            @endif
        </form>
    </div>

    <div class="table-container">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Department Name</th>
                    <th>Tax Allocated</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($fundTaxes as $fundTax)
                    <tr>
                        <td>{{ $fundTax->id }}</td>
                        <td>{{ $fundTax->department_name }}</td>
                        <td>${{ number_format($fundTax->tax_allocated, 2) }}</td>
                        <td>{{ $fundTax->created_at->format('Y-m-d') }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('admin.fund-taxes.show', $fundTax) }}" class="btn btn-secondary">
                                    <i class="fas fa-eye"></i> View
                                </a>
                                <a href="{{ route('admin.fund-taxes.edit', $fundTax) }}" class="btn btn-primary">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form method="POST" action="{{ route('admin.fund-taxes.destroy', $fundTax) }}" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4">No fund & tax records found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $fundTaxes->links() }}
    </div>
</div>
@endsection
