import React, { useState, useEffect } from "react";
import { sendAjaxRequest } from "./ajax/AjaxHelper";

const fetchSurveyData = async (dataId, name) => {
  try {
    const response = await sendAjaxRequest("getsurvey", { id: dataId, name });
    return response;
  } catch (error) {
    console.error("Ошибка получения данных:", error);
    return [];
  }
};

const updateSurveyData = async (dataId, valueId, name) => {
  try {
    const response = await sendAjaxRequest("updatesurvey", { id: dataId, valueId, name });
    console.log("Успешный ответ:", response);
    return response;
  } catch (error) {
    console.error("Ошибка запроса:", error);
    throw error;
  }
};

const CheckboxList = ({ name , articleSurveyId}) => {

    console.log(articleSurveyId,'articleSurveyId');
  const [items, setItems] = useState([]);
  const [inputAndLabelVisible, setInputAndLabelVisible] = useState(true);
  const [numVisible, setNumVisible] = useState(false);
  const [maxVotes, setMaxVotes] = useState(0);

  useEffect(() => {
    fetchData();
  }, []);

  const fetchData = async () => {
    const idElement = document.getElementById(articleSurveyId);
    const dataId = idElement.getAttribute("data-id");

    const response = await fetchSurveyData(dataId, name);
    setItems(response);

    const max = Math.max(...response.map((item) => item.votes));
    setMaxVotes(max);
  };

  const handleCheckboxChange = (valueId) => {
    const idElement = document.getElementById(articleSurveyId);
    const dataId = idElement.getAttribute("data-id");

    updateSurveyData(dataId, valueId, name)
      .then(() => {
        setInputAndLabelVisible(false);
        setNumVisible(true);
      })
      .catch((error) => {
        console.error("Ошибка запроса:", error);
      });
  };

  const calculateBarWidth = (votes) => {
    const maxPercent = 70;
    return (votes / maxVotes) * maxPercent;
  };

  return (
    <div>
      <ul>
        {items.map((item) => (
          <li key={item.id} className={numVisible ? "visible" : ""}>
            {numVisible && (
              <div className="bar" style={{ width: `${calculateBarWidth(item.votes)}%` }}></div>
            )}
            <label className="form-control" />
            {inputAndLabelVisible && (
              <>
                <input
                  type="checkbox"
                  value={item.id}
                  name="checkbox-checked"
                  onChange={() => handleCheckboxChange(item.id)}
                />
              </>
            )}
            <img src={item.image} />
            {item.label}
            {numVisible && (
              <>
                <div className="num">{item.votes} ответов</div>
              </>
            )}
          </li>
        ))}
      </ul>
    </div>
  );
};

export default CheckboxList;