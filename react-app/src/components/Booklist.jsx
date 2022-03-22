import { useState, useEffect } from "react";

export const Booklist = ({ language, getData }) => {
    const [bookData, setBookData] = useState(null);

    useEffect(() => {
        const result = getData?.(language).then((response) =>
            setBookData(response)
        );
    }, [language, getData]);

    return (
        <ul>
            {bookData === null ? (
                <p>now loading...</p>
            ) : (
                bookData.data.items.map((x, index) => (
                    // <li key={index}>{x.volumeInfo.title}</li>
                    <li key={index}><span>タイトル：</span>{x.volumeInfo.title}<span> , 著者：</span>{x.volumeInfo.authors[0]}</li>
                ))
            )}
        </ul>
    );
};