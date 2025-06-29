import React, { useEffect, useState } from "react";
import { createRoot } from "react-dom/client";
import "./Favoritescard.css"

function Favoritescard() {
  const [favorites, setFavorites] = useState([]);

  useEffect(() => {
    fetch("http://127.0.0.1:8000/favorites")
      .then((res) => res.json())
      .then((data) => {
        setFavorites(data);
      })
      .catch((err) => console.error("Error fetching favorites:", err));
  }, []);

  const handleDelete = (id) => {
    fetch(`http://127.0.0.1:8000/favorites/${id}`, {
      method: "DELETE",
      headers: {
        "X-CSRF-TOKEN": document.querySelector("meta[name='csrf-token']").content,
      },
    })
      .then(() => {
        setFavorites((prev) => prev.filter((fav) => fav.id !== id));
      })
      .catch((err) => console.error("Error deleting favorite:", err));
  };

  return (
    <div className="container">
      <h2>Your Favorite Cards</h2>
      <div className="allCardsRow">
        {favorites.map((fav) => (
          <div key={fav.id} className="card">
            <h3>{fav.finnish}</h3>
            <p><strong>English:</strong> {fav.english}</p>
            <p><strong>Example:</strong> {fav.example}</p>
            <p><strong>Pronunciation:</strong> {fav.pronunciation}</p>
            <p><strong>Category:</strong> {fav.category}</p>
            <p><strong>Difficulty:</strong> {fav.difficulty}</p>
            <button onClick={() => handleDelete(fav.id)}>🗑 Remove</button>
          </div>
        ))}
      </div>
    </div>
  );
}

const container = document.getElementById("app");
if (container) {
  const root = createRoot(container);
  root.render(<Favoritescard />);
}

export default Favoritescard;
