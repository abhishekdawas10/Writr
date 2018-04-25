import newspaper
import sys
from datetime import datetime


website_name = sys.argv[1]
current_time = datetime.now().strftime("%Y.%m.%d.%H.%M.%S")
output_file = open("article_data/" + current_time, 'w')


cnn_paper = newspaper.build(website_name,memoize_articles=False)

filled_count=0

for article in cnn_paper.articles:
	if article.title and len(article.title.strip()) > 20:
		
		
		article.download()
		article.parse()
		article.nlp()
		# output_file.write(article.publish_date.strftime("%Y-%m-%d %H:%M:%S"))
		# print("datep")
		output_file.write( article.url + "|" + article.title + "|" + article.publish_date.strftime("%Y.%m.%d.%H.%M.%S") + "|" + article.summary + "|" + article.top_image + "|}\n")
		# print("{" + article.url + "|" + article.title + "|" + article.publish_date.strftime("%Y-%m-%d %H:%M:%S") + "|" + article.summary + "|" + article.top_image + "}")
		# print("article url")
		# print(article.url)

		# print("title")
		# print(article.title)
		filled_count = filled_count + 1 
		if filled_count >= 20:
			break

output_file.close()

# for category in cnn_paper.category_urls():
	# print(category)


# article = cnn_paper.articles[0]
# article.download()
# article.parse()

# print("title")
# print(article.title)

# print("authors")
# print(article.authors)

# print("publish date")
# print(article.publish_date)

# print("text")
# print(article.text)

# print("image")
# print(article.top_image)

# print("movies")
# print(article.movies)

# print("publish nlp")
# article.nlp()

# print("keywords")
# print(article.keywords)

# print("summary")
# print(article.summary)

# print("size")
# print(cnn_paper.size())

# print("filled_count")
# print(filled_count)