export const SERVER_URL = "http://localhost:8000";

export function take_exam_url(id, slug, isFree = false) {
  if (isFree) {
    return server_url(`/exams/start-exam/${slug}`);
  }

  return server_url(`/take-exam/${id}`);
}

export function exam_image_url(img) {
  if (!img || img === "") {
    return server_url(`/uploads/exams/categories/default.png`);
  }

  return server_url(`/uploads/exams/categories/${img}`);
}

export function view_lms_url(slug) {
  return server_url(`/LMS/contents/${slug}`);
}

export function lms_image_url(img) {
  if (!img || img === "") {
    return server_url(`/uploads/exams/categories/default.png`);
  }
  return server_url(`/uploads/lms/series/${img}`);
}

export function testi_image_url(img) {
  if (!img || img === "") {
    return server_url(`/uploads/users/thumbnail/default.png`);
  }

  return server_url(`/uploads/users/thumbnail/${img}`);
}

export function server_url(to) {
  return `${SERVER_URL}${to}`;
}
