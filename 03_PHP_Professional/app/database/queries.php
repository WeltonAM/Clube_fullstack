<?php

$query = [];

require 'queryBuilder/read.php';
require 'queryBuilder/limit.php';
require 'queryBuilder/order.php';
require 'queryBuilder/paginate.php';
require 'queryBuilder/where.php';
require 'queryBuilder/join.php';
require 'queryBuilder/search.php';
require 'queryBuilder/execute.php';

require 'noQueryBuilder/create.php';
require 'noQueryBuilder/read.php';
require 'noQueryBuilder/update.php';
require 'noQueryBuilder/delete.php';
