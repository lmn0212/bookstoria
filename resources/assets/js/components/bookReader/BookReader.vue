<template>
  <div id="book-reader">
    <div class="container">
      <h1 class="title">{{author}} - {{bookName}}</h1>
      <hr>
      <div class="pagination">
        <a href="#" v-if="hasPrev" @click.prevent="fetchChapter(prevChapter)" class="prev">Назад</a>
        <a href="#" v-if="hasFirst" @click.prevent="fetchChapter(1)">1</a>
        <span v-if="hasFirst">...</span>
        <a href="#" v-for="page in pages" @click.prevent="fetchChapter(page)" :class="{current: currentChapter == page}">{{page}}</a>
        <span v-if="hasLast">...</span>
        <a href="#" v-if="hasLast" @click.prevent="fetchChapter(count)">{{count}}</a>
        <a href="#" v-if="hasNext"@click.prevent="fetchChapter(nextChapter)" class="next">Вперёд</a>
      </div>
      <h2 class="title">{{name}}</h2>
      <div class="text" v-text="text"></div>
      <div class="pagination">
        <a href="#" v-if="hasPrev" @click.prevent="fetchChapter(prevChapter)" class="prev">Назад</a>
        <a href="#" v-if="hasFirst" @click.prevent="fetchChapter(1)">1</a>
        <span v-if="hasFirst">...</span>
        <a href="#" v-for="page in pages" @click.prevent="fetchChapter(page), runScroll()" :class="{current: currentChapter == page}">{{page}}</a>
        <span v-if="hasLast">...</span>
        <a href="#" v-if="hasLast" @click.prevent="fetchChapter(count)">{{count}}</a>
        <a href="#" v-if="hasNext"@click.prevent="fetchChapter(nextChapter)" class="next">Вперёд</a>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'book-reader',
  props: {
    bookId: Number,
    required: true
  },
  data () {
    return {
      bookName: '',
      author: '',
      count: 0,
      chapters: [],
      name: '',
      text: '',
      currentChapter: 1,
      range: 1
    }
  },
  computed: {
    pages () {
      let pages = [];
      for (let i = this.rangeStart; i <= this.rangeEnd; i++) {
        pages.push(i)
      }
      return pages
    },
    hasFirst () {
      return this.rangeStart > 1
    },
    hasLast () {
      return this.rangeEnd < this.count
    },
    rangeStart () {
      let start = this.currentChapter - this.range
      return (start > 0) ? start : 1
    },
    rangeEnd () {
      let end = this.currentChapter + this.range
      return (end < this.count) ? end : this.count
    },
    prevChapter () {
      return this.currentChapter - 1
    },
    nextChapter () {
      return this.currentChapter + 1
    },
    hasPrev () {
      return this.currentChapter > 1
    },
    hasNext () {
      return this.currentChapter < this.count 
    }
  },
  created () {
    this.fetchBook(this.bookId)
  },
  watch: {
    chapters () {
      this.fetchChapter(this.currentChapter)
    }
  },
  methods: {
    fetchBook (id) {
      let url = `/api/getChapters/${id}`;
      this.$http.get(url).then(res => {
        let data = res.body;
        this.bookName = data.bookname;
        this.author = data.author;
        this.count = data.count;
        this.chapters = data.data;
      })
    },
    fetchChapter (index) {
      let chapter = this.getChapter(index);
      this.currentChapter = index;
      let url = `/api/getChapter/${chapter.id}`;
      this.$http.get(url).then(res => {
        let data = res.body;
        this.name = data.data.name;
        this.text = data.data.text;
      })
    },
    getChapter (index) {
      return this.chapters[index - 1]
    }
  }
}
</script>

<style>
* {
  margin: 0;
  padding: 0;
}
.title, .pagination {
  text-align: center;
  margin-top: 10px;
}
a {
  display: inline-block;
  padding: 5px;
  border: 1px solid silver;
  text-decoration: none;
}
.current {
  border: 1px solid red;
}
p {
  padding-top: 10px;
}
</style>