 @auth('custom')
                    <a href="{{ route('user.account') }}" class="nav-item">
                        <span class="icon">👤</span>
                        {{ Auth::guard('custom')->user()->name ?? 'Guest User' }}
                    </a>