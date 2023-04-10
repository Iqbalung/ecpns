import React from "react";
import { Link } from "react-router-dom";
import { exam_image_url, take_exam_url } from "../../../../utils/ecpns";

export default function Exam({ data, classes }) {
  const price = Number(data.cost);
  const oldPrice = data.oldPrice ? Number(data.oldPrice) : 0;
  const isOffer = data.oldPrice && price < oldPrice;
  const offerInPercentage = Math.round((100 * (oldPrice - price)) / oldPrice);
  return (
    <div
      className={`edu-card card-type-5 radius-small ${classes ? classes : ""}`}
    >
      <div className="inner">
        <div className="thumbnail">
          <a href={take_exam_url(data.id, data.slug, data.is_paid === 0)}>
            <img
              className="w-100"
              src={exam_image_url(data.image)}
              alt="Course Thumb"
            />
          </a>
          <div className="top-position status-group left-top">
            {isOffer && (
              <span className="eduvibe-status status-01 bg-secondary-color">
                {offerInPercentage}% Off
              </span>
            )}
            <span className="eduvibe-status status-01 bg-primary-color">
              {data.level}
            </span>
          </div>
          <div className="wishlist-top-right">
            <button className="wishlist-btn">
              <i className="icon-Heart"></i>
            </button>
          </div>
        </div>
        <div className="content">
          <div className="price-list price-style-03">
            {data.is_paid === 0 ? (
              <div className="price current-price">Free</div>
            ) : (
              <div className="price current-price">Rp. {data.cost}</div>
            )}
            {data.oldPrice && (
              <div className="price old-price">${data.oldPrice}</div>
            )}
          </div>
          <h6 className="title">
            <a href={take_exam_url(data.id, data.slug, data.is_paid === 0)}>
              {data.title}
            </a>
          </h6>
          <ul className="edu-meta meta-01">
            <li>
              <i className="icon-time-line"></i>
              {data.dueration} mins
            </li>
            <li>
              <i className="icon-group-line"></i>
              {data.total_marks} Marks
            </li>
          </ul>
          <div className="card-bottom">
            <div className="read-more-btn">
              <Link
                className="btn-transparent"
                to={process.env.PUBLIC_URL + `/course-details/${data.id}`}
              >
                Enroll Now<i className="icon-arrow-right-line-right"></i>
              </Link>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}
