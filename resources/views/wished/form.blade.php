


<form action="{{ isset($action) && $action ===  'POST' ?  route('wishes.store') :  route('wishes.update', $wished) }}"
enctype="multipart/form-data" method="POST""
                enctype="multipart/form-data" method="POST">
                <div class="row">
                    @csrf
                @if(isset($action) && $action ===  'PUT')
                    <input type="hidden" name="_method" value="PUT">
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
					<fieldset>
						<div id="message"></div>
						<div class="f-row">
							<label for="name">Nom *</label>
                            <input type="text" name="name" value="{{ (old('name')) ? old('name') : ((isset($wished) ? $wished->name : '')) }}"  class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Nom" required="required">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="f-row">
                            @if(isset($wisheds))
                <p>
                    <img src="{{ $wished->smAvatar }}" alt="{{ $wished->name }}" class="img-fluid img-thumbnail">
                </p>
            @endif
                            <label for="image">Photo *</label>
							<input type="file" id="image" name="image" />
						</div>
						<div class="f-row">
							<label for="comments">Texte souhait *</label>
							<textarea id="content" name="content">{{ old('content') }}</textarea>
						</div>
						<div class="f-row">

                            <button id="close">ENREGISTRER</button>
						</div>
					</fieldset>
				</form>
