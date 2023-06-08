                                <div class="d-flex">
                                    <a href="{{ route('asset.admin.show', ['admin' => $v]) }}"
                                        class="btn btn-outline-dark btn-sm me-2"><i class="bi-person-lines-fill"></i></a>



                                    @if (Auth::user()->level == 'admin')
                                        <a href="{{ route('admin.edit', ['admin' => $v]) }}"
                                            class="btn btn-outline-dark btn-sm me-2"><i class="bi-pencil-square"></i></a>
                                        <div>
                                            <form action="{{ route('admin.destroy', ['admin' => $v]) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-outline-dark btn-sm me-2"><i
                                                        class="bi-trash"></i></button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
