<div class="pagination-class-name" data-pagination-class-name='<?php echo json_encode($data['Plugin']['pagination']) ?>'></div>
<nav class="pagination-container">
    <ul class="pagination justify-content-end mt-2">
        <li class="page-item">
            <a class="page-link first-page disabled" href="javascript:void(0)" tabindex="-1" aria-label="First" data-page="1">
                <i class="fas fa-angle-double-left"></i>
            </a>
        </li>
        <li class="page-item">
            <a class="page-link prev-page disabled" href="javascript:void(0)" tabindex="-1" aria-label="Previous">
                <i class="fas fa-angle-left"></i>
            </a>
        </li>
        <div class="d-flex list-page"></div>
        <li class="page-item">
            <a class="page-link next-page disabled" href="javascript:void(0)" tabindex="-1" aria-label="Next">
                <i class="fas fa-angle-right"></i>
            </a>
        </li>
        <li class="page-item">
            <a class="page-link last-page disabled" href="javascript:void(0)" tabindex="-1" aria-label="Last">
                <i class="fas fa-angle-double-right"></i>
            </a>
        </li>
    </ul>
</nav>