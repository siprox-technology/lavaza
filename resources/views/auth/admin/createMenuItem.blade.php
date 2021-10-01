                        {{-- new item form --}}
                        <div class="row menu-item w-100 filter-newItem">
                            <div class="col-lg-8 col-12">
                                <form class="text-left clearfix" action="{{route('admin.menu-items.store')}}" method="post">
                                    @csrf
                                    {{-- menu name --}}
                                    <div class="form-group">
                                        <select name="menu_name" id="" class="form-control @error('name') border border-danger @enderror">
                                            <option value="null"default>انتخاب نوع غذا</option>
                                            <option value="Starter">اسنارتر</option>
                                            <option value="Side">ساید</option>
                                            <option value="Drinks">نوشیدنی ها</option>
                                            <option value="Main">غذای اصلی</option>
                                        </select>
                                        @error('menu_name')
                                            <div class=" text-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    {{-- name --}}
                                    <div class="form-group">
                                        <input type="text" name="name" dusk="name" id="name" maxlength="128"
                                            class="form-control @error('name') border border-danger @enderror" placeholder="نام لاتین"
                                            value="">
                                        @error('name')
                                            <div class=" text-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    {{-- name_fa --}}
                                    <div class="form-group">
                                        <input type="text" name="name_fa" dusk="name_fa" dusk="name_fa" id="name_fa" maxlength="128"
                                            class="form-control @error('name_fa') border border-danger @enderror" placeholder="نام"
                                            value="">
                                        @error('name_fa')
                                            <div class=" text-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    {{-- ingredients_fa --}}
                                    <div class="form-group">
                                        <input type="text" name="ingredients_fa" dusk="ingredients_fa" id="ingredients_fa" maxlength="512"
                                            class="form-control @error('ingredients_fa') border border-danger @enderror"
                                            placeholder="مواد تشکیل دهنده" value="">
                                        @error('ingredients_fa')
                                            <div class=" text-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    {{-- price --}}
                                    <div class="form-group">
                                        <input type="text" name="price" dusk="price" id="price" maxlength="8"
                                            class="form-control  @error('price') border border-danger @enderror"
                                            placeholder="قیمت" value="">
                                        @error('price')
                                            <div class=" text-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    {{-- stock --}}
                                    <div class="form-group">
                                        <input type="stock" name="stock" dusk="stock" id="stock" maxlength="4"
                                            class="form-control @error('stock') border border-danger @enderror"
                                            placeholder="موجودی(تعداد)" value="">
                                        @error('stock')
                                            <div class=" text-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" dusk="RegisterSubmitBtn">ذخیره ایتم جدید</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-4 col-12 mt-4">
                                <div class="row justify-content-center">
                                    <div class="menu-image mt-2">
                                        <img src="{{ asset('images/menu/ایتم جدید.jpg') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>