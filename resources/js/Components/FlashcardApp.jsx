import React, { useEffect, useState } from "react";
import FlashCardsingle from "./FlashCardsingle";
import "./Flashcardapp.css";

export default function FlashcardApp() {
  const [words, setWords] = useState([]);
  const [limit, setlimit] = useState(5);
  const [page, setpage] = useState(1);

  useEffect(() => {
    fetch(`http://127.0.0.1:8000/proxy/words?limit=${limit}&page=${page}`)
      .then((res) => res.json())
      .then((data) => {
        console.log("API Response:", data);
        setWords(data.words || data);
      })
      .catch((err) => console.error("Fetch error:", err));
  }, [limit, page]);

  return (
    <>
      <div className="filterContaner">
        <div>
        <label htmlFor="limit">How many words:</label>
        <input
          type="number"
          value={limit}
          onChange={(e) => setlimit(e.target.value)}
          id="limit"
        />
        <label htmlFor="page">Where to start:</label>
        <input
          type="number"
          value={page}
          onChange={(e) => setpage(e.target.value)}
          id="page"
        />
        </div>

<div className="nevegationBtn">
        <button
          className="cardControl"
          onClick={() => setpage((prev) => Math.max(prev - 1),1)}
        >
          {" "}
          ⏪{" "}
        </button>
        <button
          className="cardControl"
          onClick={() => setpage((prev) => prev + 1)}
        >
         ⏩
        </button>
      </div>
      </div>

      <div className="container">
        <div className="allCardsRow">
          {words.map((word) => (
            <FlashCardsingle key={word.id} {...word} />
          ))}
        </div>
      </div>

      
    </>
  );
}
