import { NavLink, Link } from "react-router";

import React from "react";

function Header({ name }) {
  return (
    <div>
      <header className={styles.header}>
        <div className="logo">
          <Link to="/">
            <h2>{name}</h2>
          </Link>
        </div>
        <nav>
          <ul>
            <NavLink to="/dashboard">dashboard</NavLink>
            <NavLink to="/flashcards">flashcards list</NavLink>
          </ul>
        </nav>
      </header>
    </div>
  );
}

export default Header;
