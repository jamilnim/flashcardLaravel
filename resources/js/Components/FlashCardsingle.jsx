import React, { useEffect, useState } from "react";
import "./FlashCardsingle.css";

function FlashCardsingle({
  id,
  category,
  finnish,
  difficulty,
  english,
  pronunciation,
  example,
}) {
  const [englishView, setEnglishView] = useState(false);
  const toggle = () => setEnglishView((prev) => !prev);
  const [isSaved, setIsSaved] = useState(false);

  useEffect(() => {
    // Fetch all favorites once and see if current word is in them
    fetch("http://127.0.0.1:8000/favorites")
      .then((res) => res.json())
      .then((data) => {
        const yes = data.some((fav) => fav.finnish === finnish);
        setIsSaved(yes);
      });
  }, [finnish]);

  const handleFavorite = () => {
    if (isSaved) {
      alert("✅ Already saved to favorites!");
      return;
    }

    fetch("http://127.0.0.1:8000/favorites", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]')
          .content,
      },
      body: JSON.stringify({
        finnish,
        english,
        example,
        category: category || "general",
        difficulty: difficulty || "medium",
        pronunciation: pronunciation || "",
      }),
    })
      .then((res) => res.json())
      .then((data) => {
        console.log("Saved to favorites:", data);
        alert("Added to favorites!");
        setIsSaved(true);
      })
      .catch((err) => {
        console.error("Error saving favorite:", err);
        alert("Failed to add favorite");
      });
  };

  return (
    <div className="finishCardContaine">
      <div className="finishCard">
        <div className="dataRow">
          <div className="datakey">ID:</div>
          <div className="datavalue">{id}</div>
        </div>
        <div className="dataRow">
          <div className="datakey">Difficulty:</div>
          <div className="datavalue">{difficulty}</div>
        </div>
        <div className="dataRow">
          <div className="datakey">Category:</div>
          <div className="datavalue">{category}</div>
        </div>
        <div className="dataRow">
          <div className="datakey">Finnish:</div>
          <div className="datavalue">{finnish}</div>
        </div>
        <div className="dataRow">
          <div className="datakey">Pronunciation:</div>
          <div className="datavalue">{pronunciation}</div>
        </div>
        <button onClick={toggle}>
          {englishView ? "Hide English" : "Show English"}
        </button>
        <button onClick={handleFavorite}>
          {" "}
          {isSaved ? "✅ Saved" : "💾 Save"}
        </button>
      </div>

      {englishView && (
        <div className="englishCard">
          <div className="dataRow">
            <div className="datakey">English:</div>
            <div className="datavalue">{english}</div>
          </div>
          <div className="dataRow">
            <div className="datakey">Example:</div>
            <div className="datavalue">{example}</div>
          </div>
        </div>
      )}
    </div>
  );
}

export default FlashCardsingle;
