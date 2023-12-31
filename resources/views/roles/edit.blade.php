@extends('layouts.app') @section('content')

      <!-- Main Content -->
      <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <div class="section-header-back">
                        <a href="/roles" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                    </div>
                    <h1>Edit Role</h1>
                    <div class="section-header-breadcrumb"> @foreach($breadcrumbs as $breadcrumb) <div class="breadcrumb-item">
									<a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['label'] }}</a>
								</div> @endforeach </div>
                </div>

                <div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Edit Role</h4>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('roles.update', $role->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="name">Name</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="text" class="form-control" id="name" name="name" value="{{ $role->name }}">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="name">Permissions</label>
                  <div class="col-sm-12 col-md-7">
                    <select name="permissions[]" id="permissions" class="form-control select2" multiple required>
                    @foreach($permissions as $permission)
                    <option value="{{ $permission->id }}" @if($role->permissions->contains('id', $permission->id)) selected @endif>{{ $permission->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Enabled</label>
                                            <div class="selectgroup w-100 col-sm-12 col-md-7">
                                                <label class="selectgroup-item">
                                                    <input type="radio" name="enabled" value="1" class="selectgroup-input" {{ $role->enabled ? 'checked' : '' }}>
                                                    <span class="selectgroup-button">Enable</span>
                                                </label>
                                                <label class="selectgroup-item">
                                                    <input type="radio" name="enabled" value="0" class="selectgroup-input" {{ !$role->enabled ? 'checked' : '' }}>
                                                    <span class="selectgroup-button">Disable</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="description">Description</label>
                  <div class="col-sm-12 col-md-7">
                    <input type="text" class="form-control" id="description" name="description" value="{{ $role->description }}">
                  </div>
                </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        @endsection