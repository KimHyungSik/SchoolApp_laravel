@extends('layouts.ContentBottomNavigation') @section('notice-board-content')
<link href="{{ asset('/css/Board/DetailBoard.css') }}" rel="stylesheet" />
<link
	rel="stylesheet"
	href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"
/>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
@extends('layouts.MenuTitle-Back')
<body>
	@section('menu-title-back') @endsection
	<section>
		<h1>{{ $data["title"] }}</h1>
		<div class="writeday">
			<span>
				@if ($data['author'])
				<small>{{ $data["author"] }}</small>
				@else
				<h5>익명</h5>
				@endif
				<span
					><i class="far fa-thumbs-up"></i>
					{{ $data["like_count"] }}</span
				>
			</span>
			<a
				type="button"
				id="board-trash"
				data-toggle="modal"
				data-target="#myBoard-delete-modal"
				><i class="fas fa-trash-alt"></i
			></a>

			{{-- 게시판 삭제 모달 창 띄우기 --}}
			<div
				class="modal fade"
				id="myBoard-delete-modal"
				tabindex="-1"
				role="dialog"
				aria-labelledby="exampleModalCenterTitle"
				aria-hidden="true"
			>
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLongTitle">
								게시글 삭제
							</h5>
						</div>
						<div class="modal-body">
							이 게시글을 삭제하시겠습니까?
						</div>
						<div class="modal-footer">
							<button
								type="button"
								class="btn btn-secondary"
								data-dismiss="modal"
							>
								취소
							</button>
							@if($my_board)
							<a
								href="javascript:void(0)"
								type="button"
								class="btn btn-primary"
								onclick="Deleteboard({{ $board_id }},{{
									$student_id
								}})"
								value="삭제"
								>삭제</a
							>
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="content">
			<h3>{!!$data['content']!!}</h3>
		</div>
	</section>
	<div class="line"></div>
	<h6>댓글 <i class="fas fa-chevron-right"></i></h6>
	<section class="comment">
		<div>
			<ul id="comment-id">
				@foreach ($comment_datas as $comment)
				<li>
					<div>
						{{ $comment["author"] }}
						{{-- / {{ $comment["like_count"] }} --}}
					</div>
					{{-- 휴지통 클릭 --}}
					@if ($comment['is_mine'] == '1')
						<a
							type="button"
							id="comment-trash"
							data-toggle="modal"
							data-target="#myComment-delete-modal"
							><i class="fas fa-trash-alt"></i
						></a>
					@endif
					<div>
						{{ $comment["content"] }}
					</div>
					<small>{{ date('m-d h:i',strtotime($comment["time_write"])) }}</small>
				</li>

				{{-- 댓글 삭제 모달 창 띄우기 --}}
				<div
					class="modal fade"
					id="myComment-delete-modal"
					tabindex="-1"
					role="dialog"
					aria-labelledby="exampleModalCenterTitle"
					aria-hidden="true"
				>
					<div
						class="modal-dialog modal-dialog-centered"
						role="document"
					>
						<div class="modal-content">
							<div class="modal-header">
								<h5
									class="modal-title"
									id="exampleModalLongTitle"
								>
									댓글 삭제
								</h5>
							</div>
							<div class="modal-body">
								이 댓글을 삭제하시겠습니까?
							</div>
							<div class="modal-footer">
								<button
									type="button"
									class="btn btn-secondary"
									data-dismiss="modal"
								>
									취소
								</button>
							</div>
							<a
							href="javascript:void(0)"
							type="button"
							class="btn btn-primary"
							id="delete-comment"
							onclick="delete_comment({{
								$student_id
							}}, {{ $comment['reply_id'] }})"
							>
							삭제
						</a>
						</div>
					</div>
				</div>
				@endforeach
			</ul>
		</div>

		<div class="comment-more">
			<button
				id="more-comment"
				class="btn btn-outline-secondary"
				onclick="more_comment({{ $board_id }},{{ $student_id }},'{{
					$userName
				}}')"
			>
				댓글 더보기
			</button>
		</div>
	</section>
	<div class="form-group mx-sm-3 mb-2" id="edit-comment" style="display:none">
		<a href="javascript:void(0)" id="edit-comment-close"><i class="fas fa-times" style="font-size: 1rem"></i></a>
		<input
			type="text"
			class="form-control"
			id="write-comment"
			placeholder="댓글을 등록하세요."
		/>
		<button
			id="create-comment"
			onclick="create_comment({{ $board_id }},{{ $student_id }},'{{
				$userName
			}}')"
			type="submit"
			class="btn btn-primary"
		>
			등록
		</button>
	</div>
	<script src="{{ asset('js/DetailBoard.js') }}"></script>
	<script>
		var closebtn = document.getElementById('edit-comment-close');
		closebtn.addEventListener('click', function() {
			$("#edit-comment").css("display","none");
			$(".btn-fixed-bottom").css("display","flex");
		});
	</script>
</body>
@endsection
