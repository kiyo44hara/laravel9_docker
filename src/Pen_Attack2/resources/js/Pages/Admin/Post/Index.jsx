import React, { useState } from 'react';
import { Box, Heading, FormControl, FormLabel, Input, Textarea, Button } from '@chakra-ui/react';
import { Inertia } from '@inertiajs/inertia';

const index = () => {
  const [title, setTitle] = useState('');
  const [content, setContent] = useState('');

  const handleTitleChange = (e) => {
    setTitle(e.target.value);
  };

  const handleContentChange = (e) => {
    setContent(e.target.value);
  };

  const handleSubmit = (e) => {
    e.preventDefault();
    
    // フォームのリセット
    setTitle('');
    setContent('');

    // Inertiaのpostメソッドを使ってデータを送信
    Inertia.post('/post', { title, content });
  };

  return (
    <Box maxW="md" mx="auto" mt={8} p={4}>
      <Heading as="h1" size="lg" mb={4}>
        新規投稿
      </Heading>

      <form onSubmit={handleSubmit}>
        <FormControl mb={4}>
          <FormLabel>タイトル</FormLabel>
          <Input
            type="text"
            value={title}
            onChange={handleTitleChange}
            placeholder="タイトルを入力してください"
          />
        </FormControl>

        <FormControl mb={4}>
          <FormLabel>内容</FormLabel>
          <Textarea
            value={content}
            onChange={handleContentChange}
            placeholder="内容を入力してください"
            rows={6}
          />
        </FormControl>

        <Button type="submit" colorScheme="blue">
          投稿する
        </Button>
      </form>
    </Box>
  );
};

export default index;
