const fs = require("fs");

const files = [
  "./SQL_files/create_database.sql",
  "./SQL_files/mock_data_users.sql",
  "./SQL_files/mock_data_accommodations.sql",
  "./SQL_files/mock_data_images.sql",
  "./SQL_files/mock_data_reviews.sql",
  "./SQL_files/mock_data_bookings.sql",
];

const output = files.reduce((acc, file) => {
  return acc + fs.readFileSync(file, "utf8");
}, "");

fs.writeFileSync("./merged.sql", output);
