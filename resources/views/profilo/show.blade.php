<x-layout>
    <div class="col-12 col-md-10 col-lg-6 mt-5 pt-5 mt-md-0 p-0 mx-auto">

        @foreach ($spheres as $sphere)
            <div class="row my-5 d-flex mx-auto justify-content-center">

                <div class="col-12 col-md-9 col-lg-11 justify-content-center px-4">

                    <div class="card mx-auto rounded-5" style="width: 100%;">

                        {{-- Intestazione --}}
                        <div class="row d-flex justify-content-evenly align-items-center">

                            <div class="col-12 d-flex justify-content-evenly align-items-center ">

                                {{-- img --}}
                                <div>
                                    <img src="{{ $sphere->user->img }}" alt="" width="45"
                                        class="rounded-circle d-block mx-auto ">
                                </div>

                            {{-- nome utente --}}

                            <a href="{{ route('profilo.show', $sphere->user->id) }}"
                                class="text-decoration-none text-white pt-3 ">
                                <h5 class="card-title roboto-slab">{{ $sphere->user->name }}</h5>


                                @if ($sphere->updated_at == $sphere->created_at)
                                    <p><small>Creato il: {{ $sphere->created_at->format('d/m/Y') }}</small></p>
                                @else
                                    <p><small>Modificato il: {{ $sphere->updated_at->format('d/m/Y') }}</small></p>
                                @endif
                            </a>

                                {{-- bottone --}}
                                <div class="mt-3 btn-group">
                                    @if (Auth::user()->id == $sphere->user->id)
                                        <button class="btn btn-sm" type="button" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="bi bi-three-dots fs-4"></i>
                                        </button>
                                        <ul class="dropdown-menu text-center">
                                            <li class="d-flex mx-auto">
                                                <a href={{ route('edit.sphere', compact('sphere')) }}
                                                    class="dropdown-item">
                                                    <i class="bi bi-pencil-square"></i>
                                                    <p><small>Modifica</small></p>
                                                </a>
                                            </li>

                                            <li class="d-flex mx-auto">
                                                <button wire:click="destroy({{ $sphere }})" class="dropdown-item">
                                                    <i class="bi bi-trash3-fill"></i>
                                                    <p><small>Elimina</small></p>
                                                </button>
                                            </li>
                                        </ul>
                                    @endif
                                </div>
                            </div>
                        </div>

                        {{-- contenuto del testo --}}
                        <div class="card-body border-top">
                            <p class="card-text text-center">
                                {!! \App\Http\Controllers\SphereController::renderTagLinks($sphere->body) !!}
                            </p>

                            <p class="card-text text-center">
                                @if ($sphere->tags->isNotEmpty())
                                    @foreach ($sphere->tags as $tag)
                                        <a href="{{ route('index.tag', compact('tag')) }}"
                                            class="text-primary text-decoration-underline">{{ $tag->name }}</a>
                                    @endforeach
                                @endif
                            </p>

                            @if ($sphere->img)
                                <img src="{{ Storage::url($sphere->img) }}" class="card-img-top rounded-5"
                                    alt="img">
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
    </div>


    <div class="col-lg-3 bg_col d-none d-lg-block sticky3"></div>
</x-layout>
