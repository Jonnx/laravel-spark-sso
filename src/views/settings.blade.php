@extends('spark::layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                
                <div class="card">
                    <div class="card-header">
                        {{ $team->name }} Single Sign On (SSO) Settings
                    </div>
                    <div class="card-body">
                        
                        <form class="mb-0" method="POST" action="/settings/teams/{{ $team->id }}/sso">
                            
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            
                            <div class="form-group">
                                <label for="ssoEmailDomain">SSO Email Domain</label>
                                <input name="sso_email_domain" value="{{ $team->sso_email_domain }}" type="text" class="form-control" id="ssoEmailDomain" aria-describedby="ssoEmailDomainHelper" placeholder="The domain for your team's emails. (mycompany.com, enge.io...)">
                                <small id="ssoEmailDomain" class="form-text text-muted">Anyone who logs in with Google will be automatically added to your team.</small>
                            </div>
                            
                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                            
                        </form>
                        
                    </div>
                </div>
                
            </div>
        </div>
    </div>

@endsection