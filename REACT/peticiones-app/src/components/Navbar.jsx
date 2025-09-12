import React from 'react'

export const Navbar = () => {
    return (
        <>
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Navbar</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <Link to="/" class="nav-link" >Home</Link> {/*Link para redirigir en el Navbar */}
                            </li>
                            <li class="nav-item">
                                <Link to="/session" class="nav-link" >Session</Link> {/*Link para redirigir en el Navbar */}
                            </li>
                            <li class="nav-item">
                                <Link to="/search-character" class="nav-link">Search Character</Link> {/*Link para redirigir en el Navbar */}
                            </li>
                            

                        </ul>
                    </div>
                </div>
            </nav>
        </>
    )
}


