export const SERVER_URL = "http://localhost:8000";

export function take_exam_url(id, slug, isFree = false) {
  if (isFree) {
    return server_url(`/exams/start-exam/${slug}`);
  }

  return server_url(`/take-exam/${id}`);
}

export function exam_image_url(img) {
  return server_url(`/uploads/exams/categories/${img}`);
}

export function server_url(to) {
  return `${SERVER_URL}${to}`;
}
