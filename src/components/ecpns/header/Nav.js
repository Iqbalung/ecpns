import React from "react";
import { Link } from "react-router-dom";

export default function Nav() {
  return (
    <ul className="mainmenu">
      <li>
        <Link to="/">Home</Link>
      </li>

      <li className="has-droupdown">
        <Link to="#">Courses</Link>
        <ul className="submenu">
          <li>
            <Link to="/site/courses">Browse</Link>
          </li>
          <li>
            <Link to="/site/pattren">Patterns</Link>
          </li>
          <li>
            <Link to="/site/syllabus">Syllabus</Link>
          </li>
          <li>
            <Link to="/practice-exams">Practice Exams</Link>
          </li>
        </ul>
      </li>

      <li>
        <Link to="/LMS/all-categories">LMS</Link>
      </li>

      <li>
        <Link to="#">Pricing</Link>
      </li>

      <li className="has-droupdown">
        <Link to="#">About</Link>
        <ul className="submenu">
          <li>
            <Link to="#">Why Us</Link>
          </li>
          <li>
            <Link to="#">About Us</Link>
          </li>
          <li>
            <Link to="#">Our Mission</Link>
          </li>
          <li>
            <Link to="#">Contact Us</Link>
          </li>
        </ul>
      </li>

      <li className="has-droupdown">
        <Link to="#">More</Link>
        <ul className="submenu">
          <li>
            <Link to="#">Blogs</Link>
          </li>
          <li>
            <Link to="#">FAQs</Link>
          </li>
        </ul>
      </li>
    </ul>
  );
}
